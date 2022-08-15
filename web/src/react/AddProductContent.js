import AddProductForm from "./AddProductForm.js";

const AddProductContent = function () {

    const [alertBlock, setAlertBlock] = React.useState(null);

    function saveFormData() {
        let inputs = document.getElementsByClassName("input");

        if (validateForm(inputs)) {
            clearError();
            let request = {};
            Array.from(inputs).map(input => {
                request[input.id] = input.value
            })
            $.ajax({
                url: 'http://juniortest/add-product-handler',
                method: 'post',
                dataType: 'html',
                data: request,
                success: function (data) {
                    if (data.status) {
                        console.log("ok");
                    } else {
                        console.log("bad");
                        //viewValidationError()
                    }
                },
                error: function () {
                    viewError();
                }
            });
        } else {
            viewValidationError()
        }

        function viewValidationError() {
            setAlertBlock(
                <div className="alert alert-danger alert-dismissible fade show" role="alert"
                     style={{marginTop: "10px"}}>
                    Some fields are not filled or filled incorrectly!
                </div>
            );
        }

        function viewError() {
            setAlertBlock(
                <div className="alert alert-danger alert-dismissible fade show" role="alert"
                     style={{marginTop: "10px"}}>
                    Something went wrong!
                    <button type="button" className="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            );
        }

        function clearError() {
            setAlertBlock("");
        }

    }

    function validateForm(inputs) {
        let invalid = false;
        let numInputs = document.getElementsByClassName("input num");
        let productType = document.getElementById("productType");


        if (productType.value == "") {
            productType.classList.add("is-invalid");
            invalid = true;
        }

        Array.from(inputs).forEach(input => {
            if (input.value === "") {
                input.classList.add("is-invalid");
                invalid = true;
            }
        });

        Array.from(numInputs).forEach(input => {
            if (Number.isInteger(input.value) && input.value >= 0) {
                input.classList.add("is-invalid");
                invalid = true;
            }
        });


        return !invalid;

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
                <div>{alertBlock}</div>
                <AddProductForm/>
            </main>
        </div>
    )
}


export default AddProductContent;