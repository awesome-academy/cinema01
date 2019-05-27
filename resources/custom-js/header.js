$(document).ready(function () {
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
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">{{ __('label.notFound') }}</div></div>'
            ],
            header: '<div class="container"><div class="row">',
            suggestion: function (data) {
                return `<div class="col-sm">
                    <a href='{{ route('movie-detail.index') }}/` + data.id + `'>
                        <img src="{{ asset(config('app.upload_cover')) }}/` + data.image + `" title='` + data.name + `'' class="img-thumbnail custom-img-thumbnail">
                    </a>
                </div>`;
            }
        }
    });
});
