export default class ReviewForm {
    constructor() {
        if(document.querySelector('body.shop')) {
            this.initEls()
            this.initEvents()
            this.updateFormIsOpen = false
            this.addFormIsOpen = false
        } else return
    }

    initEls() {
        const __ = selector => document.querySelector(selector)
        this.els = {
            updateReviewForm : __('.js-update-review-form'),
            updateReviewButton : __('.js-update-review-button'),
            addReviewButton: __('.js-add-review-button'),
            addReviewForm: __('.js-add-review-form')
        }
    }

    initEvents() {
        this.els.updateReviewButton.addEventListener('click', () => this.toggleUpdateForm())
        this.els.addReviewButton.addEventListener('click', () => this.toggleAddForm())
    }

    toggleAddForm() {
        if(this.addFormIsOpen) {
            this.els.updateReviewForm.style.height = 0
            this.addFormIsOpen = false
        } else {
            const targetHeight = this.els.addReviewForm.scrollHeight
            this.els.addReviewForm.style.height = `${targetHeight}px`
            this.addFormIsOpen = true
        }
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
