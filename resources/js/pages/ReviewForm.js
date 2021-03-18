export default class ReviewForm {
    constructor() {
        this.initEls()
        this.initEvents()
        this.updateFormIsOpen = false
    }

    initEls() {
        const __ = document.querySelector
        this.els = {
            updateReviewForm : __('.js-update-review-form'),
            updateReviewButton : __('.js-update-review-button'),
            addReviewButton: __('.js-add-review-button'),
        }
    }

    initEvents() {
        this.els.updateReviewButton.addEventListener('click', () => this.toggleUpdateForm())
    }

    toggleUpdateForm() {
        if(this.updateFormIsOpen) {
            this.els.updateReviewForm.style.height = 0
            this.updateFormIsOpen = false
        } else {
            const targetHeight = this.els.updateReviewForm.scrollHeight
            this.els.updateReviewForm.style.height = `${targetHeight}px`
            this.updateFormIsOpen = true
        }
    }
}
