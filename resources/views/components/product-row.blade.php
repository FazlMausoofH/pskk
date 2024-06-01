<tr class="bg-white border-b hover:bg-gray-50 text-center">
    <td class="px-6 py-4"><span class="row-index">{{ $rowIndex }}</span></td>
    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $product->code }}</td>
    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $product->name }}</td>
    <td class="px-6 py-4">
        <input type="number" class="border-2 border-black py-1 p-2 qty-input" value="1" min="1" onchange="updateTotalFromQtyInput(this)">
    </td>
    <td class="px-6 py-4">{{ number_format($product['selling_price'], 0) }}</td>
    <td class="px-6 py-4 total-cell">{{ number_format($product['selling_price'], 0) }}</td>    
    <td class="flex justify-center px-6 py-4">
        <button class="font-medium text-red-600 hover:underline" onclick="deleteRow(this)">Delete</button>
    </td>
</tr>
