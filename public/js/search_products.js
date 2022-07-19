import * as utils from './utils.js';
$(document).ready(function () {

    let txtSearch = '';
    const populate = (item) =>
        $('#search_results').append(`
            <div class="col-sm-6 pt-2">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">${item.type} </h5>
                        <p>${utils.showCategories(item)}</p>
                        <h6>${utils.formatMoney(item.cost)}</h6>
                        <p class="card-text">${item.description}</p>
                        <a href="#" class="btn btn-primary">add</a>
                    </div>
                </div>
            </div>               
        `);

    const populateSearchUI = (items) => {

        if (!items.length) {

            $('#search_results').html(utils.setMessage('No products found'));
            return;
        }

        items.forEach(item => populate(item));

    };

    const getSearchResults = () => {

        $.ajax({

            url: $('#searchRoute').val(),
            data: {
                txtSearch: txtSearch
            },
            dataType: 'json',
            success: (responseData) => {
                if ($.trim($('#search_results').html()).length > 0) $('#search_results').html('');
                populateSearchUI(responseData);
            }
        });
    }

    getSearchResults();

    $('#search').on('keyup search', function() {
        txtSearch = $(this).val();
        getSearchResults();
       
    });

    // prevent form submission
    $(document).on('submit', '#productsSearchForm',  () => false);


});