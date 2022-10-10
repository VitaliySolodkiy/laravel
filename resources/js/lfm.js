export var lfm = function (id, type, options) {
    let button = document.getElementById(id);

    button.addEventListener('click', function () {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        var target_input = document.getElementById(button.getAttribute('data-input'));
        var target_preview = document.getElementById(button.getAttribute('data-preview'));

        window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
            var file_path = items.map(function (item) {
                return item.url;
            }).join(',');

            // set the value of the desired input to image url
            target_input.value = file_path;
            target_input.dispatchEvent(new Event('change'));

            // clear previous preview
            target_preview.innerHtml = '';

            // set or change the preview image src
            items.forEach(function (item) {
                let img = document.createElement('img')
                img.setAttribute('style', 'height: 5rem')
                img.setAttribute('src', item.thumb_url)
                target_preview.appendChild(img);
            });

            // trigger change event
            target_preview.dispatchEvent(new Event('change'));
        };
    });
};