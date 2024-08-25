const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
let priceGap = 20000;

priceInput.forEach(input => {
    input.addEventListener("input", e => {
        let minPrice = parseInt(priceInput[0].value),
            maxPrice = parseInt(priceInput[1].value);

        if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
            if (e.target.className === "input-min") {
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            } else {
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input => {
    input.addEventListener("input", e => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

        if ((maxVal - minVal) < priceGap) {
            if (e.target.className === "range-min") {
                rangeInput[0].value = maxVal - priceGap
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});


// Sarching CheckBox

src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"
$(document).ready(function () {
    $('.form-check-input').change(function () {
        var selectedTypes = [];
        $('.form-check-input:checked').each(function () {
            selectedTypes.push($(this).val());
        });
        $.ajax({
            url: "{{ route('searchBox') }}",
            type: "GET",
            data: {
                tipe: selectedTypes
            },
            success: function (response) {
                // Update tampilan dengan hasil pencarian
                console.log(response); // Untuk debug
            },
            error: function (xhr) {
                console.log(xhr.responseText); // Untuk debug
            }
        });
    });
});


// ClickAble
function handleCardClick(element) {
    const url = element.getAttribute('data-href');
    if (url) {
        window.location.href = url;
    }
}
