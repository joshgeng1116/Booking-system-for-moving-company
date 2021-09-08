// For moving_from field

(function() {
    var widget, initAddressFinder = function() {
        widget = new AddressFinder.Widget(
            document.getElementById('moving-from'),
            '4DB9WCGXNMT3R6LA7YUV',
            'AU', {
                "address_params": {
                    "gnaf": "1",
                    "state_codes": "VIC"
                },
                "max_results": "5",
                "empty_content": "No addresses were found. This could be a new address, or you may need to check the spelling. Learn more"
            }
        );

        widget.on('address:select', function(fullAddress, metaData) {
            document.getElementById('moving-from').value = metaData.full_address

        });


    };

    function downloadAddressFinder() {
        var script = document.createElement('script');
        script.src = 'https://api.addressfinder.io/assets/v3/widget.js';
        script.async = true;
        script.onload = initAddressFinder;
        document.body.appendChild(script);
    };

    document.addEventListener('DOMContentLoaded', downloadAddressFinder);
})();

// For moving_to field

(function() {
    var widget, initAddressFinder = function() {
        widget = new AddressFinder.Widget(
            document.getElementById('moving-to'),
            '4DB9WCGXNMT3R6LA7YUV',
            'AU', {
                "address_params": {
                    "gnaf": "1",
                    "state_codes": "VIC"
                },
                "empty_content": "No addresses were found. This could be a new address, or you may need to check the spelling. Learn more"
            }
        );

        widget.on('address:select', function(fullAddress, metaData) {
            document.getElementById('moving_to').value = metaData.full_address

        });


    };

    function downloadAddressFinder() {
        var script = document.createElement('script');
        script.src = 'https://api.addressfinder.io/assets/v3/widget.js';
        script.async = true;
        script.onload = initAddressFinder;
        document.body.appendChild(script);
    };

    document.addEventListener('DOMContentLoaded', downloadAddressFinder);
})();
