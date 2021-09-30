let only_need_rating = true;
$stars = $(".stars");
console.log($stars);
const feedback = document.getElementsByClassName("feedback_text_section")[0].children[1].children[1];
const feedback_regex = /^[\w \-,\.\n']+$/;


$stars.click(function (event) {
    /*
    console.log(event.target);
    $clicked_star = $(event.target)[0];
    console.log($clicked_star);
    $clicked_star.classList.remove("far");
    $clicked_star.classList.add("fas");

     */

    console.log(event.target.id);
    star_no = event.target.id;
    const stars = document.getElementsByClassName("stars");
    const feedback_text_section = document.getElementsByClassName("feedback_text_section");
    console.log(feedback_text_section);


    // to fill in stars
    for (let i = 0; i < star_no; i++) {
        console.log("star " + i + " will be filled.");
        let current_star = document.getElementsByClassName("fa-star")[i];
        current_star.classList.remove("far");
        current_star.classList.add("fas");
    }

    // to remove fill from remaining stars
    for (let i = star_no; i < document.getElementsByClassName("fa-star").length; i++) {
        let current_star = document.getElementsByClassName("fa-star")[i];
        current_star.classList.remove("fas");
        current_star.classList.add("far");
    }

    // Check the corresponding radio button for the review score
    radiobtn = document.getElementById("feedback-stars-" + star_no);
    console.log("Radio button:");
    console.log(radiobtn);
    radiobtn.checked = true;

    // Allow a comment if the feedback score was less than 2 (stars)
    if (star_no <= 2) {

        stars[0].classList.remove("stars_happy");
        stars[0].classList.add("stars_sad");

        only_need_rating = false;

        document.getElementById("feedback-comment").innerHTML = "";


        feedback_text_section[0].classList.remove("hide");


        let plural = true;

        if (star_no == 1) {
            plural = false;
        }

        // Show feedback field
        if (plural) {
            document.getElementById("feedback_question").innerHTML = "Only two stars out of five! How can we improve?";
        } else {
            document.getElementById("feedback_question").innerHTML = "Only one star out of five! How can we improve?";
        }

        document.getElementsByClassName("submit_section")[0].classList.add("lock");


    } else {

        stars[0].classList.remove("stars_sad");
        stars[0].classList.add("stars_happy");

        only_need_rating = true;

    }

    if (only_need_rating) {


        // Hide feedback field
        feedback_text_section[0].classList.add("hide");

        // Set input of feedback field to (customer rated 3+ stars, not necessary)
        document.getElementById("feedback-comment").innerHTML = "N/A";

        document.getElementsByClassName("submit_section")[0].classList.remove("lock");

    } else {

        // Check if there is any input in the feedback form
        if(isInputInFeedbackForm()) {
            document.getElementsByClassName("submit_section")[0].classList.remove("lock");
        } else {
            document.getElementsByClassName("submit_section")[0].classList.add("lock");

        };

    }
})

$(feedback).on("input", function(event) {
    // Check if there is any input in the feedback form
    if(isInputInFeedbackForm()) {
        document.getElementsByClassName("submit_section")[0].classList.remove("lock");
    } else {
        document.getElementsByClassName("submit_section")[0].classList.add("lock");

    };
})

function isInputInFeedbackForm() {
   if(feedback_regex.test(feedback.value)) {
       return true;
   } else {
       return false;
   };
}
