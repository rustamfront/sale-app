import './bootstrap';

document.querySelectorAll('.btn-product').forEach(item => {
    item.addEventListener('click', e => {
        const parent     = e.target.closest('.product')
        const quantity   = parent.querySelector('[name="quantity"]').value
        const product_id = parent.querySelector('[name="product_id"]').value
        const url = '/cart/create'

        axios.post(url, {
            'quantity': quantity,
            'product_id': product_id
        }).then(response => {
            console.log(response)
        }).catch(error => {
            console.log(error)
        })
    })
})

document.querySelector('form.cart').addEventListener('submit', e => {
    e.preventDefault()

    const total_price = e.target.querySelector('[name="total_price"]').value
    const url = e.target.getAttribute('action')

    axios.post(url, {
        'total_price': total_price,
    }).then(response => {
        document.querySelector('.order-success').classList.add('active')
    }).catch(error => {
        console.log(error)
    })
})
