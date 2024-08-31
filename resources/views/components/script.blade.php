<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/bab584fabc.js" crossorigin="anonymous"></script>
<script>
function formatNumber(number) {
    if (number >= 1e6) {
        return (number / 1e6).toFixed(1) + 'M';
    } else if (number >= 1e3) {
        return (number / 1e3).toFixed(1) + 'K';
    } else {
        return number;
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('input').addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            const query = document.getElementById('input').value;
            
            fetch(`search-videos?query=${query}`)
                .then(response => response.json())
                .then(videos => {
                    const videoContainer = document.getElementById('video-container');
                    videoContainer.innerHTML = ''; 
                    
                    const descripcionContainer = document.getElementById('descripcion-container');
                    descripcionContainer.innerHTML = ''; 

                    const tituloContainer = document.getElementById('titulo');
                    descripcionContainer.innerHTML = ''; 

                    const vista = document.getElementById('vista');
                    vista.innerHTML = ''; 
                    
                    videos.forEach(video => {
                        const viewCount = formatNumber(parseInt(video.statistics.viewCount));
                        const videoElement = document.createElement('div');
                        videoElement.innerHTML = `
                            <iframe 
                                src="https://www.youtube.com/embed/${video.id}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen
                            </iframe>
                        `;
                        videoContainer.appendChild(videoElement);
                        
                        // Crear el título del video
                        const titleElement = document.createElement('div');
                        titleElement.innerHTML = `
                            <h4 class="text-white mb-4">${video.snippet.title}</h4>
                        `;
                        tituloContainer.appendChild(titleElement);
                        
                        // Crear la descripción del video
                        const descriptionElement = document.createElement('div');
                        descriptionElement.innerHTML = `
                            <h6 class="text-white">${video.snippet.description}</h6>
                            <button class="btn text-white p-0">Ver más</button>
                        `;
                        descripcionContainer.appendChild(descriptionElement);

                        // Crear las vistas del video
                        const vistasElement = document.createElement('div');
                        vistasElement.innerHTML = `
                            <p class="text-white">${viewCount} Vistas</p>
                        `;
                        vista.appendChild(vistasElement);
                    });
                    document.getElementById('input').value = '';
                })
                .catch(error => {
                    console.error('Error al buscar videos:', error);
                });
        }
    });


    // Esta seccion es para la lista de videos que se cargan por defaul
    fetch(`index`)
        .then(response => response.json())
        .then(videos => {
            const videoList = document.getElementById('video-list');
            videoList.innerHTML = ''; 
            videos.forEach(video => {
                const viewCount = formatNumber(parseInt(video.statistics.viewCount));
                const videoItem = document.createElement('div');
                videoItem.classList.add('row', 'mb-4');
                videoItem.innerHTML = `
                <div class="col-md-7">
                    <iframe
                        src="https://www.youtube.com/embed/${video.id}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        style="width: 100%; height: auto;">
                    </iframe>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white">${video.snippet.title}</h6>
                    <p class="text-white">${video.snippet.channelTitle}</p>
                    <p class="text-white">${viewCount} Vistas</p>
                </div>
            `;
                videoList.appendChild(videoItem);
            });
        })
        .catch(error => {
            console.error('Error al cargar videos:', error);
        });
});

</script>


        