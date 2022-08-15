const AddProductForm = function () {

    const [selectValue, setSelectValue] = React.useState("");
    const [selectAdditionsValue, setSelectAdditionsValue] = React.useState();

    function selectHandler(event) {
        event.target.className = "form-select select";
        const value = event.target.value;
        setSelectValue(value);
        switch (value) {
            case "dvd":
                setSelectAdditionsValue(
                    <div>
                        <label htmlFor="size">Size (MB)</label>
                        <input id="size" className="form-control input num" type="number" onChange={onChangeNumInput}/>
                        <span><i>Please, provide disc space in MB</i></span>
                    </div>
                )
                break;

            case "book":
                setSelectAdditionsValue(
                    <div>
                        <label htmlFor="weight">Weight (KG)</label>
                        <input id="weight" className="form-control input num" type="number"
                               onChange={onChangeNumInput}/>
                        <span><i>Please, provide book weight in Kg</i></span>
                    </div>
                )
                break;

            case "furniture":
                setSelectAdditionsValue(
                    <div>
                        <label htmlFor="height">Height (CM)</label>
                        <input id="height" className="form-control input num" type="number"
                               onChange={onChangeNumInput}/>
                        <label htmlFor="width">Width (CM)</label>
                        <input id="width" className="form-control input num" type="number" onChange={onChangeNumInput}/>
                        <label htmlFor="length">Length (CM)</label>
                        <input id="length" className="form-control input num" type="number"
                               onChange={onChangeNumInput}/>
                        <span><i>Please, provide furniture size in Cm</i></span>
                    </div>
                )
                break;
        }
    }

    function onChangeNumInput(e) {
        if (Number.isInteger(Number(e.target.value)) && e.target.value !== "" && Number(e.target.value) >= 0) {
            e.target.className = "form-control input text is-valid";
        } else {
            e.target.className = "form-control input text is-invalid";
        }
    }

    function onChangeInput(e) {
        if (e.target.value !== "") {
            e.target.className = "form-control input text is-valid";
        } else {
            e.target.className = "form-control input text is-invalid";
        }
    }

    return (
        <div id="main-content">
            <form action="" id="product_form">
                <label htmlFor="sku">SKU</label>
                <input id="sku" className="form-control input text" type="text" onChange={onChangeInput}/>

                <label htmlFor="name">Name</label>
                <input id="name" className="form-control input text" type="text" onChange={onChangeInput}/>

                <label htmlFor="price">Price ($)</label>
                <input id="price" className="form-control input num" type="number" onChange={onChangeNumInput}/>

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