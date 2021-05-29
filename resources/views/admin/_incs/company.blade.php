@push('scripts')
<script type="text/javascript">
    var app = new Vue({
        el: '#app'
        , data: {
            method: 'POST'
            , check: false
            , errors: []
            , name: '{{ $company->name ?? "" }}'
            , address: '{{ $company->address ?? "" }}'
        , }
        , methods: {
            __create() {
                document.location.href = "{{ route('company.create') }}";
            }
            , __edit() {
                document.location.href = "{{ route('company.edit', $company->id ?? 0) }}";
            }
            , __store() {
                this.check = true;
                this.method = 'POST';
            }
            , __update() {
                this.check = true;
                this.method = 'UPDATE';
            }
            , __destroy() {
                this.check = false;
                this.method = 'DELETE';
            }
            , __back() {
                document.location.href = "{{ route('company.index') }}";
            }
            , __checkForm(e) {
                if (this.check) {
                    if (this.name && this.address) {
                        return true;
                    }

                    this.errors = [];

                    if (!this.name) {
                        this.errors.push('O nome é obrigatório.');
                    }
                    if (!this.address) {
                        this.errors.push('O endereço é obrigatório.');
                    }

                    e.preventDefault();
                }
            }
        }
    });

</script>
@endpush
