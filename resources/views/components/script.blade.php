<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/bab584fabc.js" crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('input').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                const query = document.getElementById('input').value;
                
                fetch(`/search-videos?query=${query}`)
                .then(response => response.json())
                .then(videos => {
                    const videoContainer = document.getElementById('video-container');
                    videoContainer.innerHTML = ''; 
                    
                    const videotitulo = document.getElementById('video-titulo');
                    videotitulo.innerHTML = ''; 
                    
                    videos.forEach(video => {
                        // Crear el iframe del video importante
                        const videoElement = document.createElement('div');
                        videoElement.innerHTML = `
                        <iframe 
                            src="https://www.youtube.com/embed/${video.id.videoId}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    `;
                        videoContainer.appendChild(videoElement);
                        
                        //Importante para generar el titulo dinamicamente de acuerdo al video
                        const titleElement = document.createElement('div');
                        titleElement.innerHTML = `
                        <div class="row ps-0">
                            <div class="col-md-12 col-12">
                                <h4 class="text-white">${video.snippet.title}</h4>
                            </div>
                        </div>
                    `;
                        videotitulo.appendChild(titleElement);
                    });
                    document.getElementById('input').value = '';
                })
                .catch(error => {
                    console.error('Error al buscar videos:', error);
                });
            }
        });
    });
    
</script>