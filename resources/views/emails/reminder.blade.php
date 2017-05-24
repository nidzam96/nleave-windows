<html>
<head></head>
<body>

<p>Hello HR,<br>
   Please approve {{ Auth::user()->name }}’s leave.</p>

<p>{{ Auth::user()->name }} has applied for  leave from {{ $sdate }} to {{ $edate }} with the reason "{{ $reason }}" . Please review the application and approve or reject it.</p>

<p>The approval for this application belongs to you, so do keep this e-mail safe.</p>

</body>

</html>