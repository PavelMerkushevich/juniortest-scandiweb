function initGrid() {
        var msnry = new Masonry('#main-content', {
            columnWidth: 50,
            gutter: 31,
            itemSelector: '.product',
            percentPosition: true,
        });
}

export default initGrid;


