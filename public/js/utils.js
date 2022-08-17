// async wait return error: https://javascript.tutorialink.com/i-keep-getting-undefined-after-async-call-in-another-function/
// https://contactmentor.com/find-object-in-array-of-objects/

const formatMoney = (price) =>
    new Intl.NumberFormat("en-GB", {
        style: "currency",
        currency: "GBP",
    }).format(price);
// const getCategories = () => $.get($('#categoryRoute').val(), (category) => category);

const getColours = (_) => [
    "danger",
    "primary",
    "success",
    "warning",
    "warning",
    "info",
    "light",
    "dark",
];

const randomColour = (items) => items[Math.floor(Math.random() * items.length)];

const handleError = (response) => {
    const errorStatus = response.status === 404;
    if (errorStatus)
        console.warn("could not find the specified text file location");
    return errorStatus;
};
const products = [];

function getCategories() {
    $(document).ready(function () {
        $.ajax({
            async: false,
            url: $("#categoryRoute").val(),
            success: (data) => {
                const colours = getColours().slice(0, data.length);

                data.forEach((item, i) =>
                    products.push({
                        name: item.name,
                        colour: colours[i],
                    })
                );

                return products;
            },
            error: () =>
                console.error("There was an error fetching the categories"),
        });
    });
}

getCategories();

// from db
const defaultCategoryColours = (item) => {
    const colours = [];
    const categories = item.category_list.split(",");
    categories.forEach((category) =>
        colours.push(
            products.find((product) => product.name == category).colour
        )
    );
    return colours;
};

const getCategoryColour = (colour) => {
    const categoryDetails = (obj) => (val) => obj[val];
    const categories = Object.freeze({
        pizza: "success",
        crusts: "primary",
        toppings: "warning",
    });

    const colourValue = categoryDetails(categories);
    return colourValue(colour);
};
// from predefined object
const defaultColours = (item) => {
    const categoryDetails = (obj) => (val) => obj[val];
    const productCategories = item.category_list.split(",");
    const colours = [];
    productCategories.forEach((category) =>
        colours.push(getCategoryColour(category))
    );
    // productCategories.forEach(i =>colours.push(categories[i]))
    return colours;
};

const renderUI = (categories, colours = getColours()) => {
    let output = "";
    categories.forEach(
        (category, i) =>
            (output += `<span class="badge text-bg-${colours[i] ?? "warning"} ${
                i % 2 ? "m-1" : ""
            }">${category}</span>`)
    );
    return output;
};

const showCategories = (item) => {
    const defaultColour = (item) => (colours = defaultColours(item)); /// defaultCategoryColours(item)
    const categories = item.category_list.split(",");
    const coloursExists = item.category_colours;
    let colours =
        coloursExists && coloursExists.length != categories.length
            ? item.category_colours.split(",")
            : "";

    if (!coloursExists) defaultColour(item);
    if (coloursExists && colours.length != categories.length)
        defaultColour(item);

    return renderUI(categories, colours);
};

const setMessage = (message, type = "alert-danger") => `
<div class="alert ${type} mt-4" role="alert">
    ${message}
</div>
`;

export { formatMoney, showCategories, setMessage };
