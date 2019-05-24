$(document).ready(function () {
    var notFound = $('.notFound').val();
    var linkUploadCover = $('.linkUploadCover').val();
    var routeMovieDetail = $('.routeMovie-detail').val();
    var engine = new Bloodhound({
        remote: {
            url: '/search?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });
    $("#searchNav").typeahead({
        hint: true,
        highlight: true,
        minLength: 2
    }, {
        source: engine.ttAdapter(),
        name: 'movie',
        display: function(data) {
            return data.name;
        },
        templates: {
            empty: `<div class="list-group search-results-dropdown"><div class="list-group-item">` + notFound + `</div></div>`,
            header: `<div class="container"><div class="row">`,
            suggestion: function (data) {
                return `<div class="col-sm">
                    <a href='` + routeMovieDetail + `/` + data.id + `'>
                        <img src="` + linkUploadCover + `/` + data.image + `" title='` + data.name + `'' class="img-thumbnail custom-img-thumbnail">
                    </a>
                </div>`;
            }
        }
    });
});
