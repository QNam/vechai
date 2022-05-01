window.API = {
    "news.get": 'news',
    "news.store": 'news', 
    "news.remove": 'news/remove', 
    
    "media.upload": 'media/upload',
    'fake.upload': 'fake/upload'
}

window.api = function(name) {
    return CONFIG.url + "api/" + API[name];
}