import { router } from "@inertiajs/react";
import { clsx } from "clsx";
import { format, parseISO } from "date-fns";
import { toast } from "sonner";
import { twMerge } from "tailwind-merge"

export function cn(...inputs) {
  return twMerge(clsx(inputs));
};

export function flashMessage(params){
    return params.props.flash_message;
};

export const deleteAction = (url, {closeModal, ...options} = {}) => {

    const defaultOptions = {
        preserveScroll: true,  // SCROLL HALAMAN TIDAK AKAN BERUBAH
        preserveState: true, // tdk akan me reload state react atau inertia js, sehingga data lokalnya bakal tetap ada
        onSuccess : (success) => {
            const flash = flashMessage(success);
            if(flash){
                toast[flash.type](flash.message);
            }

            if(closeModal && typeof closeModal === 'function'){ // knp kita menggunakan ini? karena utk delete action ini nnti akan ada yg mnggnkn modal, ataupun tdk
                closeModal();
            }
        },

        ...options,
    };

    router.delete(url, defaultOptions);
};

export const formatDateIndo = (dateString) => {
    return format(parseISO(dateString), 'eeee, dd MMMM yyyy', { locale: id }); // kamis, 01,02, agustus, 2025
};

export const formatToRupiah = (amount) => {
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    });

    return formatter.format(amount);
};

// ES6
export const STUDYPLANSTATUS = {
    PENDING: 'Pending',
    APPROVED: 'Approve',
    REJECT: 'Reject',
};

export const STUDYPLANSTATUSVARIANT = {
    [STUDYPLANSTATUS.PENDING]: 'secondary',
    [STUDYPLANSTATUS.APPROVED]: 'success',
    [STUDYPLANSTATUS.REJECT]: 'destructive',
};

export const FEESTATUS = {
    PENDING: 'Pending',
    SUCCESS: 'Sukses',
    FAILED: 'Gagal',
};

export const FEESTATUSVARIANT = {
    [FEESTATUS.PENDING]: 'secondary',
    [FEESTATUS.SUCCESS]: 'success',
    [FEESTATUS.FAILED]: 'destructive',
};

export const feeCodeGenerator = () => {
    const character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    let result = '';
    for (let i = 0; i < 6; i++){
        const randomIndex = Math.floor(Math.random() * character.length);
        result += character[randomIndex];
    }

    return result;
}
