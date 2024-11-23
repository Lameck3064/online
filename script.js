// Example of a hover effect on buttons
const buttons = document.querySelectorAll("button");
buttons.forEach((button) => {
    button.addEventListener("mouseover", () => {
        button.style.backgroundColor = "#ffa500";
        button.style.transform = "scale(1.1)";
    });
    button.addEventListener("mouseout", () => {
        button.style.backgroundColor = "#ff5722";
        button.style.transform = "scale(1)";
    });
});
