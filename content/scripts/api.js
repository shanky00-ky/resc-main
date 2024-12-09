$(document).ready(function() {
    $.ajax({
        url: 'https://api.sportradar.us/volleyball-t1/en/news.json',  
        method: 'GET',
        dataType: 'json',
        headers: {
            'Authorization': 'Bearer WatfkGGKwKlkrflt6Bt1RjOZVpfGNINy1Vqzi521' 
        },
        success: function(data) {
            console.log(data);  

            let apiContent = $('#api-content');
            apiContent.empty();

            if (data && data.news && data.news.length > 0) {
                data.news.forEach(function(item) {
                    apiContent.append(`
                        <div class="api-post">
                            <h3><a href="${item.url}" target="_blank">${item.title}</a></h3>
                            <p>${item.description}</p>
                        </div>
                    `);
                });
            } else {
                apiContent.append('<p>No volleyball news available at the moment.</p>');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
            console.log(xhr.responseText);  
            $('#api-content').html('<p>Sorry, there was an error loading the volleyball news.</p>');
        }
    });
});
