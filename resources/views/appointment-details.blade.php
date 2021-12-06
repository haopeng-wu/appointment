<x-a-master>
    <main>
        <section class="appointment-details">
            <table>
                <thead>
                Details of this appointment
                </thead>
                <tbody>
                @foreach($appointment->getAttributes() as $key => $value)
                    <tr>
                        <td>
                            <div class="name">
                                {{$key}}
                            </div>

                        </td>
                        <td>
                            <div class="value">
                                {{$value}}
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
</x-a-master>
