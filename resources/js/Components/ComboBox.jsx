import { useState } from "react";
import { Popover, PopoverContent, PopoverTrigger } from "./ui/popover";
import { Button } from "./ui/button";
import { IconCaretDown, IconCheck } from "@tabler/icons-react";
import { Command, CommandEmpty, CommandGroup, CommandInput, CommandItem } from "./ui/command";

export default function ComboBox({items, selectedItem, onSelect, placeholder = 'Pilih item..'}){
    const [open, setOpen] = useState(false);

    const handleSelect = (value) => {
        onSelect(value);
        setOpen(false);
    }

    return(
        <Popover open={open} onOpenChange={{setOpen}}>
                <PopoverTrigger asChild>
                    <Button
                    variant='outline'
                    role='combobox'
                    ariaExpanded={open}
                    className="justify-between w-full"
                    size='xl'
                    >

                    {/* semisal item labelnya sama, dgn yg dipilih maka tampilkan data tersebut, tp jk tdk tampilkan placeholder */}
                    {items.find((item) => item.label == selectedItem)?. label ?? placeholder}
                    <IconCaretDown className="ml-2 opacity-50 size-4 shrink-0"/>

                    </Button>
                </PopoverTrigger>

                <PopoverContent className="max-h-[--radix-popover-content-available-height] w-[--radix-popover-content-available-width] p-0"
                    align="start"
                >

                    <Command>
                        <CommandInput placeholder={placeholder} className="h-9">

                            <CommandEmpty>No results found.</CommandEmpty>

                            <CommandGroup>
                                {items.map((item, index) => {
                                    <CommandItem key={index} value={item.value} onSelect={(value) => handleSelect(value)}>

                                    {item.label}
                                    <IconCheck className={cn('ml-auto size-4', selectedItem == item.label ? 'opacity-100' : 'opacity-0')} />

                                    </CommandItem>
                                })}
                            </CommandGroup>
                        </CommandInput>
                    </Command>

                </PopoverContent>
        </Popover>
    )
}
