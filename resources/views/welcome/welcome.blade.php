<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Danz</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<body style="height:7000px">
    @include('components.navbar')
    @include('components.jumbotron')
    @include('components.facilites')
    <!-- javascript -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const navbar = document.getElementById('navbar');
        menuToggle.addEventListener('click', () => {
            navbar.classList.toggle('hidden');
        });
        function updateLabel(inputId, labelId) {
            const input = document.getElementById(inputId);
            const label = document.getElementById(labelId);

            input.addEventListener('input', () => {
            if (input.value) {
                const selectedDate = new Date(input.value).toLocaleDateString("en-GB", {
                day: "2-digit",
                month: "2-digit",
                year: "numeric"
                });
                label.textContent = selectedDate; 
                label.classList.add("text-gray-600"); 
            } else {
                label.textContent = inputId === "check-in" ? "Check In" : "Check Out";
                label.classList.remove("text-gray-600");
            }
            });
        }
        updateLabel("check-in", "check-in-label");
        updateLabel("check-out", "check-out-label");

    const slider = document.getElementById("slider");
    const nextButton = document.getElementById("next");
    const prevButton = document.getElementById("prev");
    
    let currentIndex = 0;  // Track the current card index
    const totalCards = slider.children.length;  // Get total number of cards
    const cardWidth = slider.children[0].offsetWidth + 16;  // Width of each card plus the gap

    // Function to move the slider
    function moveSlider() {
        const offset = currentIndex * cardWidth;
        slider.style.transform = `translateX(-${offset}px)`;

        // Disable next button when at the last card
        if (currentIndex === totalCards - 1) {
            nextButton.disabled = true;
            nextButton.classList.add("opacity-50", "cursor-not-allowed");
        } else {
            nextButton.disabled = false;
            nextButton.classList.remove("opacity-50", "cursor-not-allowed");
        }

        if (currentIndex === 0) {
            prevButton.disabled = true;
            prevButton.classList.add("opacity-50", "cursor-not-allowed");
        } else {
            prevButton.disabled = false;
            prevButton.classList.remove("opacity-50", "cursor-not-allowed");
        }
    }

    nextButton.addEventListener("click", () => {
        if (currentIndex < totalCards - 1) {
            currentIndex++;
            moveSlider();
        }
    });

    // Handle "prev" button click
    prevButton.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            moveSlider();
        }
    });

    // Initial setup
    moveSlider();
    </script>
    <!-- end javascript -->
</body>
</html>