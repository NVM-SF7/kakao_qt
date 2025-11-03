            @if (session('success') || session('error'))
                <div class="col-sm-12">
                    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show"
                        role="alert">
                        <span class="badge badge-pill badge-{{ session('success') ? 'success' : 'danger' }}">
                            {{ session('success') ? 'Success' : 'Error' }}
                        </span>
                        {{ session('success') ?? session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
