import AddProductForm from "./AddProductForm.js";

const AddProductContent = function () {

    const saveFormData = function () {
        let sku = document.getElementById("sku").value;
        let name = document.getElementById("name").value;
        let price = document.getElementById("price").value;
        let productType = document.getElementById("productType").value;
        let productAttribute;
        switch (productType) {
            case "dvd":
                productAttribute = document.getElementById("size").value;
                break;
            case "book":
                productAttribute = document.getElementById("book").value;
                break;
            case "furniture":
                let furnitureHeight = document.getElementById("height").value;
                let furnitureWidth = document.getElementById("width").value;
                let furnitureLength = document.getElementById("length").value;
                productAttribute = furnitureHeight + "x" + furnitureWidth + "x" + furnitureLength;
                break;
        }
        //TODO: Допили Ajax
        fetch("https://api.example.com/items")
            .then(res => res.json())
            .then(
                (result) => {
                    setIsLoaded(true);
                    setItems(result);
                },
                // Примечание: важно обрабатывать ошибки именно здесь, а не в блоке catch(),
                // чтобы не перехватывать исключения из ошибок в самих компонентах.
                (error) => {
                    setIsLoaded(true);
                    setError(error);
                });

    }


    return (
        <div>
            <header>
                <div id="header-content">
                    <h1 className="title">{documentTitle}</h1>
                    <div className="button-container">
                        <button className="btn btn-success header-button" onClick={saveFormData}>Save</button>
                        <a href={cancelButtonHref}>
                            <button className="btn btn-secondary header-button">Cancel</button>
                        </a>
                    </div>
                </div>
            </header>
            <main>
                <AddProductForm/>
            </main>
        </div>
    )
}


export default AddProductContent;