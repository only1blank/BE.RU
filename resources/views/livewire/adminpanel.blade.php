
    
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Пользователь</th>
                <th class="py-2">Статус</th>
                <th class="py-2">Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="py-2 text-center">{{ $order->id }}</td>
                    <td class="py-2 text-center">{{ $order->user->name }}</td>
                    <td class="py-2 text-center">{{ $order->status }}</td>
                    <td class="py-2 text-center">
                        <select wire:change="updateStatus({{ $order->id }}, $event.target.value)">
                            @foreach($statuses as $status)
                                <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

