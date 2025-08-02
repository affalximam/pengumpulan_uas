document.getElementById('url').addEventListener('input', function() {
    var url = this.value;
    // Menambahkan validasi URL agar iframe hanya memuat URL yang valid
    if (url.startsWith('https://') || url.startsWith('http://')) {
        document.getElementById('liveIframe').src = url;
    } else {
        document.getElementById('liveIframe').src = '';
    }
});


    
