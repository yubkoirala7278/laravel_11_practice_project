<h2>New Contact Form Submission</h2>
<img src="{{ $message->embed(public_path('logo.png')) }}">
<p><strong>Name:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Subject:</strong> {{ $contact->subject }}</p>
<p><strong>Message:</strong></p>
<p>{{ $contact->message }}</p>
