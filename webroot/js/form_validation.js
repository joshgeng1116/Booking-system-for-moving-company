// Represent each form input as an object with needed attributes for form validation
class Validation {
    constructor(validation_type, validation, min_length, max_length) {
        if (["regex", "dropdown", "date", "none"].includes(validation_type)) {
            this.validation_type = validation_type;
        } else {
            throw "validation type given to class Validation is not part of the array of acceptable validation types within constructor() in form_validation.js";
        }
        this.validation = validation;
        this.min_length = min_length;
        this.max_length = max_length;
    }

}

const phone_specific_error = document.getElementsByClassName("phone_specific_error")[0];
const date_specific_error = document.getElementsByClassName("date_specific_error")[0];


const validation_pureText = new Validation("regex", /^[a-zA-Z ']+$/, 1, 255);
const validation_specialText = new Validation("regex", /^[\w \-,\./']+$/, 1, 255);
const validation_specialTextAndLineBreaks = new Validation("regex", /^[\w \-,\.\n']+$/, 1, 255);
const validation_email = new Validation("regex", /^[\w|\.]+@[\w|\.]+$/, 3, 255);
const validation_phone = new Validation("regex", /^(0|\+?61)\d{9}$/, 10, 12);
const validation_date = new Validation("date", "future", null, null);
const validation_dropdown = new Validation("dropdown", "selected", null, null);
const validation_none = new Validation("none", null, null, null);

class InputField {
    constructor(id, Validation) {
        this.id = id;
        this.Validation = Validation;
        this.seenBefore = false;
        this.valid = false;
    }

    isValid(input_value) {

        const type = this.Validation.validation_type;

        // Regex given
        if (type === "regex") {
            //console.log("Regex given.");

            // console.log(input_value);

            if (this.Validation.validation.test(input_value)) {
                this.valid = true;
            } else {
                this.valid = false;
            }

        }
        // Date given
        if (type == "date") {

            // Check that it is not past or today, only future dates allowed


            function isFutureDate(today, chosen) {

                let today_year = today.getFullYear();
                let today_month = today.getMonth() + 1;
                let today_day = today.getDate();

                let chosen_year = chosen[0];
                let chosen_month = chosen[1];
                let chosen_day = chosen[2];

                // If previous year, fail
                if (chosen_year < today_year) {
                    return false;
                }

                // If same year
                if (chosen_year == today_year) {

                    // Check if previous month
                    if (chosen_month < today_month) {
                        return false;
                    }

                    // If same month
                    if (chosen_month == today_month) {

                        // Check if previous day or today (has to be FUTURE, NOT TODAY)
                        if (chosen_day <= today_day) {
                            return false;
                        }

                    }

                }

                return true;
            }

            this.valid = isFutureDate(new Date(), input_value.split("-"));

        }
        // Dropdown given
        if (type == "dropdown") {
            //console.log("DROPDOWN GIVEN");
            // console.log(input_value);
            if (input_value !== "") {
                this.valid = true;
            } else {
                this.valid = false;
            }
        }

        // console.log(this.valid);

    }

    // To change styling immediately for user interaction with form
    realTimeFeedback() {
        if (this.valid) {
            $("#" + this.id).removeClass("fail_realtime");
            $("#" + this.id).addClass("success_realtime");
            if (this.id == 'customer-phone') {
                phone_specific_error.classList.add("hide_default");
            }
            if (this.id == 'date') {
                date_specific_error.classList.add("hide_default");
            }
        } else {
            $("#" + this.id).removeClass("success_realtime");
            $("#" + this.id).addClass("fail_realtime");

            if (this.id == 'customer-phone') {
                phone_specific_error.classList.remove("hide_default");
            }
            if (this.id == 'date') {
                date_specific_error.classList.remove("hide_default");
            }
        }
    }

    interactedWith() {
        this.seenBefore = true;
    }
}

const all_form_sections = {
    section_YOU: {
        div: "section_YOU",
        inputs: [new InputField("customer-first-name", validation_pureText), new InputField("customer-last-name", validation_pureText), new InputField("customer-phone", validation_phone), new InputField("customer-email", validation_email)]
    },
    section_JOB: {
        div: "section_JOB",
        inputs: [new InputField("moving-from", validation_specialText), new InputField("moving-to", validation_specialText), new InputField("list-of-item", validation_specialTextAndLineBreaks)]
    },
    section_TRUCK: {
        div: "section_TRUCK",
        inputs: [new InputField("size", validation_dropdown)]
    },
    section_WHEN: {
        div: "section_WHEN",
        inputs: [new InputField("date", validation_date)]
    },
    section_INVALID: {
        div: "invalid_form",
        inputs: null
    },
    section_VALID: {
        div: "valid_form",
        inputs: null
    }
}

// SCRIPTING

// Make each input form listen to user input - calls validation check every time input changes
$(".form-control").on("input", validateInputtedField);

function validateInputtedField(event) {

    // Find corresponding object that represents this input field
    function findSameInputFieldObj(event) {

        // Determine what input field was interacted with
        const fired_input_id = event.target.id;
        //console.log(fired_input_id);

        // Determine which object this corresponds to
        let same_inputField;

        $.each(all_form_sections, function (key, value) {
            form_input_array = value.inputs;
            $.each(form_input_array, function (index) {
                $current_input = $(form_input_array[index])[0];
                // console.log($current_input);
                if ($current_input.id === fired_input_id) {
                    //console.log($current_input.id);
                    same_inputField = $current_input;
                }
            })
        })

        if (same_inputField !== null) {
            return same_inputField;
        } else {
            throw "Could not find a corresponding InputField object within findSameInputFieldObj() within validateInputtedField() in form_validation.js";
        }

    }

    const input_field = findSameInputFieldObj(event);
    // console.log("id of input_field is: " + input_field.id);

    /* TODO is this necessary or redundant?
    // Make the seen_before attribute true as the user has for sure interacted with this form input now
    input_field.interactedWith();
     */

    // Test if the input field is valid or not
    input_field.isValid(event.target.value);

    // Change styling accordingly
    input_field.realTimeFeedback();

    // Generating review message
    ReviewMessageInserts = {
        "customer-first-name": null,
        "customer-last-name": null,
        "customer-phone": null,
        "customer-email": null,
        "moving-from": null,
        "moving-to": null,
        "size": null,
        "list-of-item": null,
        "date": null

    }

    function generateReviewMessage() {
        $.each(all_form_sections, function (key, value) {
            let form_inputs_array = value.inputs;
            // console.log(form_inputs_array);
            if (form_inputs_array !== null) {
                $.each(form_inputs_array, function (i) {
                    let current_form_input = form_inputs_array[i];
                    let current_input_id = current_form_input.id;
                    //console.log("id: " + current_input_id);
                    //console.log(current_input_id.val());
                    //console.log($("#" + current_input_id).val());
                    ReviewMessageInserts[current_input_id] = "<a href=\"#" + current_input_id + "\">" + "<mark class='" + current_input_id + "_markup" + "'>" + $("#" + current_input_id).val() + "</mark></a>"; // TODO error here
                })

                //console.log(ReviewMessageInserts);

            }
        })

        // Now create the string of text for review message
        return `Hi there ${ReviewMessageInserts["customer-first-name"]} ${ReviewMessageInserts["customer-last-name"]}, we'll stay in touch via ${ReviewMessageInserts["customer-phone"]} and ${ReviewMessageInserts["customer-email"]} regarding your move from ${ReviewMessageInserts["moving-from"]} to ${ReviewMessageInserts["moving-to"]}. We think it would be best to use our ${ReviewMessageInserts["size"]} sized truck in order to move ${ReviewMessageInserts["list-of-item"]} on ${ReviewMessageInserts["date"]}.`;
    }

    function updateReviewMessage(message) {

        $review_message_html = $(".review_message");

        $review_message_html.html(review_message);

    }

    let review_message = generateReviewMessage();
    // console.log(review_message);

    updateReviewMessage(review_message);

    // LOCKING / UNLOCKING form sections
    function unlockNextField(section_to_unlock) {
        $div_to_unlock = $("." + section_to_unlock.div);
        $div_to_unlock.removeClass("locked_section");
    }

    function lockFutureFields(array_of_sections_to_lock) {
        console.log(array_of_sections_to_lock);

        for (let i = 0; i < array_of_sections_to_lock.length; i++) {
            $div_to_lock = $("." + array_of_sections_to_lock[i].div);
            $div_to_lock.addClass("locked_section");
        }
    }

    function allFieldsValid(section) {
        let sectionIsValid = true;
        $.each(section.inputs, function(index) {
            let valid = section.inputs[index].valid;
            if (!valid) {
                sectionIsValid = false;
                return sectionIsValid;
            }


        });

        return sectionIsValid;
    }

    function Hide(className) {
        $div = $("." + className);
        $div.addClass("hide_this");
    }

    function Reveal(className) {
        $div = $("." + className);
        $div.removeClass("hide_this");
    }


    function AllowSubmission() {
        $("#valid_form").removeClass("locked_section");
        Reveal("review_section");
        Hide("no-review_section");
    }

    function DisallowSubmission() {
        $("#valid_form").addClass("locked_section");
        Hide("review_section");
        Reveal("no-review_section");
    }


    // are all fields valid in a tested section
    if (allFieldsValid(all_form_sections.section_WHEN)) {
        AllowSubmission();
    } else {
        DisallowSubmission();
    }

    if (allFieldsValid(all_form_sections.section_TRUCK)) {
        unlockNextField(all_form_sections.section_WHEN);
    } else {
        lockFutureFields([all_form_sections.section_WHEN]);
        DisallowSubmission();

    }

    if (allFieldsValid(all_form_sections.section_JOB)) {
        unlockNextField(all_form_sections.section_TRUCK);
    } else {
        lockFutureFields([all_form_sections.section_TRUCK, all_form_sections.section_WHEN]);
        DisallowSubmission();

    }

    if (allFieldsValid(all_form_sections.section_YOU)) {
        unlockNextField(all_form_sections.section_JOB);
    } else {
        lockFutureFields([all_form_sections.section_JOB, all_form_sections.section_TRUCK, all_form_sections.section_WHEN]);
        DisallowSubmission();

    }




}
