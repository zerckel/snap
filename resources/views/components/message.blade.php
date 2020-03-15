<div class="alert alert-success">
    <div>
        <strong>Here your Snap Mail !</strong> <span class="glyphicon glyphicon-ok">You have <span class="time">10</span> s to see it !</span>
        <hr class="message-inner-separator">
        <p>
            {{ $slot }}
        </p>
    </div>
</div>
<script rel="script" type="text/javascript">
    let slot = document.querySelector('.time')
    let time = 10
    setInterval(function () {
        time = time - 1
        let number = time
        number.toString()
        slot.innerHTML = number
    }, 1000)

    setTimeout(function () {
        document.querySelector('.alert').removeChild(document.getElementsByTagName('div')[document.getElementsByTagName('div').length-1])
        document.querySelector('.alert').innerHTML = `
        <div class="container py-5">
        <div class="row">
            <div class="col-md-10">
                <h3>OPPSSS!!!! Sorry...</h3>
                <p>You can't see this snap anymore</p>
                <a class="btn btn-danger" href="/">Go Back</a>
            </div>
        </div>
    </div>
    `
    }, 10 * 1000)



</script>
