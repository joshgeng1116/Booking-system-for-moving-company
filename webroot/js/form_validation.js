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

            console.log(input_value);

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
            console.log(input_value);
            if (input_value !== "") {
                this.valid = true;
            } else {
                this.valid = false;
            }
        }

        console.log(this.valid);

    }

    // To change styling immediately for user interaction with form
    realTimeFeedback() {
        if (this.valid) {
            $("#" + this.id).removeClass("fail_realtime");
            $("#" + this.id).addClass("success_realtime");
        } else {
            $("#" + this.id).removeClass("success_realtime");
            $("#" + this.id).addClass("fail_realtime");
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
    console.log("id of input_field is: " + input_field.id);

    /* TODO is this necessary or redundant?
    // Make the seen_before attribute true as the user has for sure interacted with this form input now
    input_field.interactedWith();
     */

    // Test if the input field is valid or not
    input_field.isValid(event.target.value);

    // Change styling accordingly
    input_field.realTimeFeedback();

}
