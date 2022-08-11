const formatMoney = (price) => new Intl.NumberFormat('en-GB', { style: 'currency', currency: 'GBP' }).format(price);
// const getCategories = () => $.get($('#categoryRoute').val(), (category) => category);
const getColours = _ =>[
    'primary',
    'secondary',
    'success',
    'danger',
    'warning',
    'info',
    'light',
    'dark',
];

const randomColour = items => items[Math.floor(Math.random() * items.length)];

const handleError = (response) => {
    const errorStatus = response.status === 404;
    if (errorStatus) console.warn('could not find the specified text file location');
    return errorStatus;
};


const getCategories = async () => {

    try {
        const url = $('#categoryRoute').val();
        const response = await fetch(url);
        if(handleError(response)) return;
        return await response.json();
    } catch (e) {
        console.error(`There was an error fetching text file ${e.message}`);
    }
};

// const allCategories = async () => {
//     let productDetails = [];
//     getCategories().then(categories =>
//         categories.forEach(category => productDetails.push({
//             categoryName: category.name,
//             colour: randomColour(getColours())
//         })))
//     return productDetails

// }
const allCategories = () => {
    const productDetails = [];
    const categoryList = getCategories();
    const random = () => randomColour(getColours())

    categoryList.then(categories => {
        for (let i = 0; i < categories.length; i++) {
            const category = categories[i];
            productDetails.push({
                name: category.name,
                colour: random()
            })

        }

        console.log(productDetails)
        return productDetails;
    })
}



const DEFAULT_CATEGORIES = allCategories();

const defaultCategoryColours = _ => getColours();

const defaultCategoryColours2 = item => {
    
}


const renderUI = (categories, colours) =>{
    let output = '';
    categories.forEach((category, i) => output += `<span class="badge text-bg-${colours[i] ?? 'warning'} ${i % 2 ? 'm-1' : ''}">${category}</span>`);
    return output;
}


const showCategories = (item) => {
    // console.log({ item })
    let categories = item.category_list.split(',');
    let coloursExists = item.category_colours
    let colours = item.category_colours ? item.category_colours.split(',') : defaultCategoryColours();
    if (!coloursExists) colours = defaultCategoryColours();
    if (coloursExists && colours.length != categories.length) colours = defaultCategoryColours()
   


    return renderUI(categories, colours)
};



const setMessage = (message, type = 'alert-danger') => `
<div class="alert ${type} mt-4" role="alert">
    ${message}
</div>
`;

export { formatMoney, showCategories, setMessage };