{{-- LAUNCHING BROWSER --}}
<script>
    window.livewire.on('openBrowser', url => {
        window.open(url,
            "View Content", "toolbar=no,resizable=yes,left=200,top=200,width=600,height=400");
    });
</script>

<script>
    window.livewire.on('LoanCreated', () => {
        $('#newLoan').modal('hide');
    });
</script>

<script>
    window.livewire.on('LoanEdited',id => {
        $('#editLoan'+id).modal('hide');     
    });
</script>
<script>
    window.livewire.on('loanEdited',() => {
        $('#editLoan').modal('hide');     
    });
</script>
<script>
    window.livewire.on('approveLoan',id => {
        $('#approveLoan'+id).modal('hide');     
    });
</script>
<script>
    window.livewire.on('disburse',() => {
        $('#approveLoan').modal('hide');     
    });
</script>
<script>
    window.livewire.on('branchUpdated',id => {
        $('#editBranch'+id).modal('hide');     
    });
</script>

<script>
    window.livewire.on('loanDeleted',id => {
        $('#deleteLoan'+id).modal('hide');     
    });
</script>

<script>
    window.livewire.on('approveTransaction',() => {
        $('#transactionDetails').modal('hide');     
    });
</script>

<script>
    window.livewire.on('newPayment',() => {
        $('#newPayment').modal('hide');
    });
</script>

<script>
    $(document).ready(function() {
        $('#dismiss').fadeTo(5000, 0).slideUp(2000, function() {
            $(this).remove();
        });
    });
</script>

