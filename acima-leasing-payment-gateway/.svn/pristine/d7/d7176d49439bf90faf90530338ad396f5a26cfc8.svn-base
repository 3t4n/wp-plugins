export class AcimaCreditPreApproval {
    constructor(client) {
        this.client = client;
        this.handlePreapprovalSuccessful = this.handlePreapprovalSuccessful.bind(this);
        this.handleClose = this.handleClose.bind(this);
        this.handleError = this.handleError.bind(this);
        this.handleResize = this.handleResize.bind(this);
        this.handlePageTransition = this.handlePageTransition.bind(this);
        this.handleDenied = this.handleDenied.bind(this);
        this.handleCancelled = this.handleCancelled.bind(this);
        this.handleIncomplete = this.handleIncomplete.bind(this);
        this.handleUnhandledError = this.handleUnhandledError.bind(this);
    }

    start() {
        return this.client.preapproval({
            onPreapprovalSuccessful: this.handlePreapprovalSuccessful,
            onClose: this.handleClose,
            onError: this.handleError,
            onResize: this.handleResize,
            onPageTransition: this.handlePageTransition,
            onDenied: this.handleDenied,
            onCancelled: this.handleCancelled,
            onIncomplete: this.handleIncomplete
        }).catch(this.handleUnhandledError);
    }

    handlePreapprovalSuccessful(result) {
        console.log("Preapproval successful:", result);
    }

    handleClose() {
        console.log("Preapproval closed");
    }

    handleError(error) {
        console.error("Preapproval error:", error);
    }

    handleResize(result) {
        console.log("Preapproval resize:", result);
    }

    handlePageTransition(result) {
        console.log("Preapproval page transition:", result);
    }

    handleDenied(result) {
        console.log("Preapproval denied:", result);
    }

    handleCancelled(result) {
        console.log("Preapproval cancelled:", result);
    }

    handleIncomplete(result) {
        console.log("Preapproval incomplete:", result);
    }

    handleUnhandledError(error) {
        console.error("Unhandled preapproval error:", error);
    }
}

window.AcimaCreditPreApproval = AcimaCreditPreApproval;