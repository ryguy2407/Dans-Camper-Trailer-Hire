$(document).ready(function(){
    var client = algoliasearch("Q66I737PMM", "615c9bab05f8197668557958af66d623")
    var index = client.initIndex('bookings');
    var testsite = client.initIndex('testsite');
    autocomplete('#search-input', {hint: false}, [
        {
            source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
            displayKey: 'my_attribute',
            templates: {
                suggestion: function(suggestion) {
                    return suggestion._highlightResult.first_name.value + ' ' + suggestion._highlightResult.last_name.value + ' - ' + suggestion._highlightResult.pickup_date.value;
                }
            }
        },
        {
            source: autocomplete.sources.hits(testsite, {hitsPerPage: 5}),
            displayKey: 'my_attribute',
            templates: {
                suggestion: function(suggestion) {
                    return suggestion._highlightResult.first_name.value + ' ' + suggestion._highlightResult.last_name.value + ' - ' + suggestion._highlightResult.pickup_date.value;
                }
            }
        }
    ]).on('autocomplete:selected', function(event, suggestion, dataset) {
        if(suggestion.deleted_at) {
            var url = '/bookings/' + suggestion.id + '/trashed';
        } else {
            url = '/bookings/' + suggestion.id;
        }
        $.ajax({
            url: url
        }).done(function(html){
            $('div.modalContainer').show().html(html);
            $('div.overlay').remove();
            $('body').append('<div class="overlay"></div>');
            $('.datepicker').pikaday();
        });
    });
});