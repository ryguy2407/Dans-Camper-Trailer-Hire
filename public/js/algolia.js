var client = algoliasearch("Q66I737PMM", "615c9bab05f8197668557958af66d623")
var index = client.initIndex('bookings');
autocomplete('#search-input', {hint: false}, [
    {
        source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
        displayKey: 'my_attribute',
        templates: {
            suggestion: function(suggestion) {
                return suggestion._highlightResult.first_name.value + ' ' + suggestion._highlightResult.last_name.value + ' - ' + suggestion._highlightResult.pickup_date.value;
            }
        }
    }
]).on('autocomplete:selected', function(event, suggestion, dataset) {
    window.location.href = '/bookings/'+suggestion.id;
    console.log(suggestion, dataset);
});