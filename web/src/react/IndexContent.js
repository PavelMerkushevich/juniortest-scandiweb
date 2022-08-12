import Product from "./Product.js";
import initGrid from "../grid.js";

const IndexContent = function () {

    React.useEffect(() => {
        initGrid();
    });

    let content = [];
    for (let i = 0; i < 10; i++) {
        content.push(<Product/>)
    }

    return (
        <div>
            <header>
                <div id="header-content">
                    <h1 className="title">{documentTitle}</h1>
                    <div className="button-container">
                        <a href={addButtonHref}>
                            <button className="btn btn-success header-button">ADD</button>
                        </a>
                        <button id="delete-product-btn" className="btn btn-danger header-button">MASS DELETE</button>
                    </div>
                </div>
            </header>
            <main>
                <div id="main-content">
                    {content}
                </div>
            </main>
        </div>
    )
}

export default IndexContent;