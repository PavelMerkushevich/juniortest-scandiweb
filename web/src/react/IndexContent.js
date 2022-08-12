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
        <div id="main-content">
            {content}
        </div>

    )
}

export default IndexContent;