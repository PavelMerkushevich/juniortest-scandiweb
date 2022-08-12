const AddProductForm = function () {

    const [selectValue, setSelectValue] = React.useState("");
    const [selectAdditionsValue, setSelectAdditionsValue] = React.useState();

    const selectHandler = (event) => {
        const value = event.target.value;
        setSelectValue(value);
        switch (value) {
            case "dvd":
                setSelectAdditionsValue(
                    <div>
                        <label htmlFor="size">Size (MB)</label>
                        <input id="size" className="form-control input" type="number"/>
                        <span><i>Please, provide disc space in MB</i></span>
                    </div>
                )
                break;

            case "book":
                setSelectAdditionsValue(
                    <div>
                        <label htmlFor="weight">Weight (KG)</label>
                        <input id="weight" className="form-control input" type="number"/>
                        <span><i>Please, provide book weight in Kg</i></span>
                    </div>
                )
                break;

            case "furniture":
                setSelectAdditionsValue(
                    <div>
                        <label htmlFor="height">Height (CM)</label>
                        <input id="height" className="form-control input" type="number"/>
                        <label htmlFor="width">Width (CM)</label>
                        <input id="width" className="form-control input" type="number"/>
                        <label htmlFor="length">Length (CM)</label>
                        <input id="length" className="form-control input" type="number"/>
                        <span><i>Please, provide furniture size in Cm</i></span>
                    </div>
                )
                break;
        }
    }

    return (
        <div id="main-content">
            <form action="" id="product_form">
                <label htmlFor="sku">SKU</label>
                <input id="sku" className="form-control input" type="text"/>

                <label htmlFor="name">Name</label>
                <input id="name" className="form-control input" type="text"/>

                <label htmlFor="price">Price ($)</label>
                <input id="price" className="form-control input" type="number"/>

                <label htmlFor="productType">Type Switcher</label>
                <select value={selectValue} onChange={selectHandler} name="productType" id="productType"
                        className="form-select select">
                    <option value="" disabled>Select Type</option>
                    <option value="dvd">DVD</option>
                    <option value="book">Book</option>
                    <option value="furniture">Furniture</option>
                </select>
                {selectAdditionsValue}
            </form>
        </div>
    )
}

export default AddProductForm