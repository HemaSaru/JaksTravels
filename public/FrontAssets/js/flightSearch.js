//Bind list of airlines



// get completion list for #leavingFrom input
let listGroup = $(".autocomplete-results");

$('#leavingFrom').on('input', function () {
    var prefixText = $(this).val();
    //console.log(prefixText);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        url: '/get-completion-list',
        type: 'POST',

        data: {
            prefixText: prefixText
        },
        success: function (response) {
            $("#autocomplete-results").html(response);
            listGroup.innerHTML = response;
            //console.log(response);
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            //console.log(err.error);
        }
    });
});


// const leavingFromInput = document.getElementById('leavingFrom');
const autocompleteResults = document.getElementById('autocomplete-results');




// Add click event listener to each result item
const resultItems = autocompleteResults.querySelectorAll('div');
const parentElement2 = document.getElementById('autocomplete-results'); // Replace with your actual parent element
const leavingFromInput = document.getElementById('leavingFrom'); // Replace with your actual input field

// Attach a click event listener to the parent element
parentElement2.addEventListener('click', (event) => {
    const clickedElement = event.target;

    // Check if the clicked element or one of its ancestors matches the desired target
    let targetElement = clickedElement;
    while (targetElement) {
        if (targetElement.tagName === 'DIV') {
            const selectedValue = targetElement.textContent.trim(); // Get the selected text
            leavingFromInput.value = selectedValue; // Set the value of the input field
            parentElement2.style.display = 'none'; // Hide the parent element

            // Trigger the input event to ensure any associated listeners are notified
            const inputEvent = new Event('input', {
                bubbles: true,
                cancelable: true,
            });
            leavingFromInput.dispatchEvent(inputEvent);
            break; // Exit the loop
        }
        targetElement = targetElement.parentNode;
    }
});


// Add a click event listener to the document to hide the results when clicking elsewhere
document.addEventListener('click', (event) => {
    if (event.target !== leavingFromInput && event.target !== autocompleteResults) {
        autocompleteResults.style.display = 'none';
    }
    else {
        autocompleteResults.style.display = 'block';
    }
});

// Prevent the click on the results div from closing it
autocompleteResults.addEventListener('click', (event) => {
    event.stopPropagation();
});


/*get completion list for #goingTo input */
let listGroup2 = $(".autocomplete-results2");

$('#goingTo').on('input', function () {
    var prefixText = $(this).val();
    //console.log(prefixText);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        url: '/get-completion-list',
        type: 'POST',

        data: {
            prefixText: prefixText
        },
        success: function (response) {
            $("#autocomplete-results2").html(response);
            listGroup2.innerHTML = response;
            //console.log(response);
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            //console.log(err.error);
        }
    });
});


const GoingToInput = document.getElementById('goingTo');
const autocompleteResults2 = document.getElementById('autocomplete-results2');




// Add click event listener to each result item
const resultItems2 = autocompleteResults2.querySelectorAll('div');
const parentElement = document.getElementById('autocomplete-results2');
const goingToInput = document.getElementById('goingTo');

// Attach a click event listener to the parent element
parentElement.addEventListener('click', (event) => {
    const clickedElement = event.target;

    // Check if the clicked element or one of its ancestors matches the desired target
    let targetElement = clickedElement;
    while (targetElement) {
        if (targetElement.tagName === 'DIV') {
            const selectedValue = targetElement.textContent.trim(); // Get the selected text
            goingToInput.value = selectedValue; // Set the value of the input field
            parentElement.style.display = 'none'; // Hide the parent element

            // Trigger the input event to ensure any associated listeners are notified
            const inputEvent = new Event('input', {
                bubbles: true,
                cancelable: true,
            });
            goingToInput.dispatchEvent(inputEvent);
            break; // Exit the loop
        }
        targetElement = targetElement.parentNode;
    }
});


// Add a click event listener to the document to hide the results when clicking elsewhere
document.addEventListener('click', (event) => {
    if (event.target !== GoingToInput && event.target !== autocompleteResults2) {
        autocompleteResults2.style.display = 'none';
    }
    else {
        autocompleteResults2.style.display = 'block';
    }
});

// Prevent the click on the results div from closing it
autocompleteResults2.addEventListener('click', (event) => {
    event.stopPropagation();
});


/* Bind List of Airlines */
$('#airlinesList').click(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        url: '/get-airlines-list',
        type: 'POST',
        dataType: 'json',

        success: function (response) {
            if (response && response.airlines) {
                var selectElement = $("#airlinesList");
                selectElement.empty();

                $.each(response.airlines, function (index, airline) {
                    selectElement.append('<option value="' + airline.code + '">' + airline.name + '</option>');
                });
            }

        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.error);
        }
    });

});

/* Send parameters to search flights */

/*$('#btnSearch').click( function () {
    var leavingFrom = $('#leavingFrom').val();
    var goingTo = $('#goingTo').val();
    var tripType = $('#tripType').val();
    var depart = $('#depart').val();
    var returnDate = $('#return').val();
    var directFlights = $('#directFlights').val();
    var airlinesList = $('#airlinesList').val();
    var adult = $('#adult').val();
    var youth = $('#youth').val();
    var child = $('#child').val();

    console.log( leavingFrom + ' ' + goingTo + ' ' + tripType + ' ' + depart + ' ' + returnDate + ' ' + directFlights + ' ' + airlinesList + ' ' + adult + ' ' + youth + ' ' + child);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $.ajax({
        url: '{{ route("search") }}',
        type: 'POST',

        data: {
            leavingFrom: leavingFrom,
            goingTo: goingTo,
            tripType: tripType,
            depart: depart,
            returnDate: returnDate,
            directFlights: directFlights,
            airlinesList: airlinesList,
            adult: adult,
            youth: youth,
            child: child,

        },
        success: function (response) {
           
            console.log(response);
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.error);
        }
    });
});
*/