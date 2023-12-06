function changeClass(clickedElement) {
    // Lấy tất cả các phần tử có class 'TourStartDate'
    var buttons = document.querySelectorAll('.TourStartDate');

    // Lặp qua từng phần tử và kiểm tra
    buttons.forEach(function(button) {
        if (button === clickedElement) {
            // Nếu là phần tử được click, thay đổi class
            if (button.classList.contains('btn-primary')) {
                button.classList.remove('btn-primary');
                button.classList.add('btn-outline-primary');
                button.name = "StartDate";
            } else {
                button.classList.remove('btn-outline-primary');
                button.classList.add('btn-primary');
                button.name = "";
            }
        } else {
            // Nếu không phải phần tử được click, thay đổi class khác (nếu cần)
            // Ví dụ: reset tất cả các phần tử về trạng thái mặc định
            button.classList.remove('btn-outline-primary');
            button.classList.add('btn-primary');
            button.name = "";
        }
    });


}