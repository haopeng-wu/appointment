<x-a-master>
    <main>
        <section class="appointment-details">
            <table>
                <caption>
                    Details of this appointment
                </caption>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Value</th>
                </tr>
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
