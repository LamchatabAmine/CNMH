<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Ajouter membre</h3>
    </div>
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input name="nom" type="text" class="form-control" id="nom" placeholder="Enter nom">
            </div>

            <div class="form-group">
                <label for="Prenom">Prenom</label>
                <input name="prenom" type="text" class="form-control" id="Prenom" placeholder="Prenom">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="email">
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input name="password" type="Password" class="form-control" id="Password" placeholder="password">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>



{{--
    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($member) ? 'Edit member' : 'Add member' }}</h3>
    </div>
    <form method="POST" action="{{ isset($member) ? route('member.update', $member->id) : route('member.store') }}">
        @csrf
        @if (isset($member))
            @method('PUT')
        @endif
        <div class="card-body">
            <!-- Form fields (same as before) -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($member) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>
--}}
