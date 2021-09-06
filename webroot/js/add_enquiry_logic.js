$review_message_content = $(".review_panel");
$review_error = $(".review-error");
review_message = "";
$review_message_p = $(".review_message");

// LIMITS for validation
const max_name_length = 150;
const max_email_length = 100;
const max_text_length = 1000;
const email_reg_expression = /^[^ ]+@[^ ]+$/;


// Animations
async function display($elemToDisplay) {
    return $elemToDisplay.css("display", "block");
}

async function no_display($elemToDisplay) {
    return $elemToDisplay.css("display", "none");
}

// TODO only make it show feedback based on if database request successful/failure not automatic
function show_submit_feedback() {
    // use a promise from server next iteration
    $(".form_submit_feedback_section").removeClass("hide_default");
}

function reveal($elemToShow) {
    display($elemToShow).then(

        function(value) {
            $elemToShow.addClass("reveal");
        },
        function(error) {
            console.log("error in reveal().");
        }

    );

}

function hide($elemToHide) {
    no_display($elemToHide).then(

        function(value) {
            $elemToHide.removeClass("reveal");
        },
        function(error) {
            console.log("error in reveal().");
        }

    );

}

// For validating user input
class FormAttribute {
    constructor($elem, validity_type) {
        this.attribute = $elem;
        this.validity_type = validity_type;
        this.valid = false;
        this.seen = false;
    }
}

$first_name = $(".first_name");
$last_name = $(".last_name");
$phone = $(".phone_number");
$email = $(".email");
$from = $(".moving_from");
$to = $(".moving_to");
$item_list = $(".items_list");
$truck_size = $(".truck_size");
$start = $(".start_date");
$start_time = $(".start_time");
$end_time = $(".end_time");
$note = $(".special_note_input");

// Create a FormAttribute object for each form input
let first_name = new FormAttribute($first_name, "name");
let last_name = new FormAttribute($last_name, "name");
let phone = new FormAttribute($phone, "phone");
let email = new FormAttribute($email, "email");
let from = new FormAttribute($from, "text");
let to = new FormAttribute($to, "text");
let item_list = new FormAttribute($item_list, "text");
let truck_size = new FormAttribute($truck_size, "dropdown");
let start = new FormAttribute($start, "date");
let start_time = new FormAttribute($start_time, "time");
let end_time = new FormAttribute($end_time, "time");
let note = new FormAttribute($note, "text");

let form_attribute_array = [first_name, last_name, phone, email, from, to, item_list, truck_size, start, start_time, end_time]

function validate() {

    // for each mandatory attribute
    $.each(form_attribute_array, function(index, attribute_obj) {

        // console.log(attribute_obj);

        // check its validation validity_type
        attribute_current = attribute_obj.attribute;
        validation_type_current = attribute_obj.validity_type;
        attribute_value = attribute_current.val();

        /*
        console.log("attribute_current..");
        console.log(attribute_current);
        console.log("validation_type_current: " + validation_type_current);
        console.log("value:");
        console.log(attribute_value);
        */

        switch (validation_type_current) {

            case "name":
                if (attribute_value.length > 0 && attribute_value.length < max_name_length) {
                    attribute_obj.valid = true;
                    // console.log("A name field was set to valid.");
                } else {
                    attribute_obj.valid = false;
                }
                break;
            case "phone":
                if (attribute_value.length >= 8 && attribute_value.length <= 10) {
                    attribute_obj.valid = true;
                    // console.log("A phone field was set to valid.");

                } else {
                    attribute_obj.valid = false;
                }
                break;
            case "email":
                // console.log("Passes email regex test: " + email_reg_expression.test(attribute_value));
                email_regex = email_reg_expression.test(attribute_value);
                console.log(email_regex);
                // && email_reg_expression.test(attribute_value)
                if (attribute_value.length > 0 && attribute_value.length < max_email_length && email_regex) {
                    attribute_obj.valid = true;
                    // console.log("An email field was set to valid.");
                } else {
                    attribute_obj.valid = false;
                }

                break;

            case "text":

                if (attribute_value.length > 0 && attribute_value.length <= max_text_length) {

                    // console.log("A text field was set to valid.");
                    attribute_obj.valid = true;

                } else {
                    attribute_obj.valid = false;
                }

                break;

            case "dropdown":

                if (attribute_value !== "none_chosen") {
                    // console.log("A dropdown field was set to valid.");
                    attribute_obj.valid = true;

                } else {
                    attribute_obj.valid = false;

                }

                break;

            case "date":

                if (attribute_value) {
                    attribute_obj.valid = true;
                    // console.log("A date field was set to valid.");

                } else {
                    attribute_obj.valid = false;
                }
                break;

            case "time":
                if (attribute_value) {
                    attribute_obj.valid = true;
                } else {
                    attribute_obj.valid = false;
                }

                break;



            default:
                console.log("Error in switch in validate().");
                break;

        }

        // see what attributes are valid
        //console.log("Elem is valid: " + attribute_obj.valid);

    })




}

// oninput="updateReview(); validate();"

function updateReview() {

    all_mandatory_valid = true;

    $.each(form_attribute_array, function(index, attribute_obj) {

        if (!attribute_obj.valid) {
            all_mandatory_valid = false;
        }

    })


    if (all_mandatory_valid) {

        $first_name_val = $first_name.val();
        $last_name_val = $last_name.val();
        $phone_val = $phone.val();
        $email_val = $email.val();
        $items_val = $item_list.val().toLowerCase();
        $from_val = $from.val();
        $to_val = $to.val();
        $start_val = $start.val();
        $start_time_val = $start_time.val();
        $end_time_val = $end_time.val();
        $truck_size_val = $(".truck_size :selected").val();
        $truck_size_selected = $(".truck_size :selected").text();

        $special_note_val = $note.val();

        // console.log("$special_note_val: " + $special_note_val);

        review_message = `Hi <a class="mark" href="#first_name_label">${$first_name_val}</a> <a class="mark" href="#last_name_label">${$last_name_val}</a>, we'll stay in touch via <a class="mark" href="#phone_label">${$phone_val}</a> and <a class="mark" href="#email_label">${$email_val}</a>. We'd love to help you move <a class="mark" href="#items_list_label">${$items_val}</a> from <a class="mark" href="#from_label">${$from_val}</a> to <a class="mark" href="#to_name_label">${$to_val}</a> on <a class="mark" href="#start_label">${$start_val}</a> between <a class="mark" href="#start_time_label">${$start_time_val}</a> and <a class="mark" href="#end_time_label">${$end_time_val}</a>. We think it's best to use a <a class="mark" href="#truck_size_label">${$truck_size_val}</a> truck for this job if we're talking about <a class="mark" href="#truck_size_label">${$truck_size_selected}</a>.`;

        // TODO fix special note review message appending
        /*
        if ($(".special_note_input").length > 0) {

          review_message += " We'll be sure to take into consideration: ${$special_note_val}";

          if (!($(".special_note_input")[$(".special_note_input").length - 1] == "." || $(".special_note_input")[$(".special_note_input").length - 1] == "!" || $(".special_note_input")[$(".special_note_input").length - 1] == "?")) {
            review_message += ".";
          }

        }
        */

        $review_message_p.html(review_message);
        hide($review_error);
        reveal($review_message_content);

    } else {

        hide($review_message_content);
        reveal($review_error);

    }

}

function unlockNextSection() {

    // console.log("unlockNextSection()...");

    // To unlock a section
    function unlock($sections_to_unlock_array) {

        $.each($sections_to_unlock_array, function(index, $section) {

            // console.log($section);

            $($section).removeClass("no-proceed");

        });

    }

    // To LOCK a section
    function lock($sections_to_unlock_array) {

        $.each($sections_to_unlock_array, function() {

            this.addClass("no-proceed");

        });

    }

    // For checking validity bool of an array of FormAttribute objects
    function checkValidity($form_attribute_obj_array) {

        all_inputs_valid = true;

        $.each($form_attribute_obj_array, function(index, $form_attribute_obj) {

            // console.log("$form_attribute_obj.validity_type: " + $form_attribute_obj.validity_type + " is valid: " + $form_attribute_obj.valid);

            if (!$form_attribute_obj.valid) {

                all_inputs_valid = false;

            }

        });

        return all_inputs_valid;


    }



    // Inputs in each section
    $you_section_array = [first_name, last_name, phone, email];
    $job_section_array = [from, to, item_list];
    $truck_section_array = [truck_size];
    $when_section_array = [start, start_time, end_time];

    // Actual sections
    $job_section = $(".job_section");
    $truck_section = $(".truck_section");
    $when_section = $(".when_section");
    $review_section = $(".review_section");
    $optional_note_section = $(".note_section");
    $submit_section = $(".submit_section");




    // if the "When" section is all valid, unlock the next section i.e. the "Optional Note" section
    if (checkValidity($when_section_array)) {
        unlock([$optional_note_section, $review_section, $submit_section]);
    } else {
        lock([$optional_note_section, $review_section, $submit_section]);
    };


    // if the "Truck" section is all valid, unlock the next section i.e. the "When" section
    if (checkValidity($truck_section_array)) {
        unlock($when_section);
    } else {
        lock([$when_section, $optional_note_section, $review_section, $submit_section]);
    };

    // if the "Job" section is all valid, unlock the next section i.e. the "Truck" section
    if (checkValidity($job_section_array)) {
        unlock($truck_section);
    } else {
        lock([$truck_section, $when_section, $review_section, $optional_note_section, $submit_section]);
    };

    // if the "You" section is all valid, unlock the next section i.e. the "Job" section
    if (checkValidity($you_section_array)) {
        unlock($job_section);
    } else {
        lock([$job_section, $truck_section, $when_section, $review_section, $optional_note_section, $submit_section]);
    };




}


/*

console.log("updateReview()");


console.log("all_fields_valid: " + all_fields_valid);

if (all_fields_valid) {



} else {


}

*/


// script

$(".form-control").attr("oninput", "validate(); updateReview(); unlockNextSection();");

$submit_btn = $(".submit_btn");
$submit_btn.click(show_submit_feedback);
