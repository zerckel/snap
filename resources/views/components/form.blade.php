<div class="container-fluid">
    <div class="container">
        <div class="formBox">
            <form method="post">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Write your SnapMail</h1>
                    </div>
                </div>
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="inputBox">
                            <input placeholder="Name" name="name" class="input @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="inputBox">
                            <input type="email" placeholder="Email" name="mail"
                                   class="input @error('mail') is-invalid @enderror" value="{{ old('mail') }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="inputBox">
                            <input placeholder="Object" type="text" name="object" value="{{ old('object') }}"
                                   class="input @error('object') is-invalid @enderror">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="inputBox">
                            <textarea name="message" placeholder="Write your message" class="input"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="button">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
