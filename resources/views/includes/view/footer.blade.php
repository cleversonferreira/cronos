<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/flipclock.min.js') }}"></script>

<script>
    let seconds = '<?= $cronos->diff ?>';

    $(document).ready(function() {
        let clock = $('.clock').FlipClock(seconds, {
            clockFace: 'DailyCounter',
            countdown: true
        });
    });
</script>

</body>
</html>
