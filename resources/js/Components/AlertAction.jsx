import { AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogDescription, AlertDialogTitle, AlertDialogTrigger } from "@radix-ui/react-alert-dialog";
import { AlertDialogContent, AlertDialogFooter, AlertDialogHeader } from "./ui/alert-dialog";
// buatam sendiri componentnya
export default function AlertAction({trigger, action,
    title = 'Apakah anda benar benar yakin?',
    description = 'Tindakan ini tidak dapat dibatalkan, Tindakan ini akan menghapus data secara permanen dan menghapus data dari server kami'
}) {
    return (
        <AlertDialog>

            <AlertDialogTrigger asChild={trigger}></AlertDialogTrigger>

            <AlertDialogContent>

                <AlertDialogHeader>
                    <AlertDialogTitle>{title}</AlertDialogTitle>
                    <AlertDialogDescription>{description}</AlertDialogDescription>
                </AlertDialogHeader>

                <AlertDialogFooter>
                    <AlertDialogCancel>Cancel</AlertDialogCancel>
                    <AlertDialogAction onClick={action}>Continue</AlertDialogAction>
                </AlertDialogFooter>

            </AlertDialogContent>

        </AlertDialog>
    )
}
