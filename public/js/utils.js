const formatMoney = (price) => new Intl.NumberFormat('en-GB', { style: 'currency', currency: 'GBP' }).format(price);
const showCategories = (item) => {
    let output = '';
    let categories = item.category_list.split(',');
    let colours = item.category_colours.split(',');

    categories.forEach((category, i) => output += `<span class="badge text-bg-${colours[i] ?? 'success'} ${i % 2 ? 'm-1' : ''}">${category}</span>`);
    return output;

};
const setMessage = (message, type = 'alert-danger') => `
<div class="alert ${type} mt-4" role="alert">
    ${message}
</div>
`
export { formatMoney, showCategories, setMessage };