<?php
/**
 * Created by PhpStorm.
 * User: Milad
 * Date: 10/18/2017
 * Time: 10:01 AM
 */

namespace App\Transformers;



use App\Nedsa\Transformer;

class AdvertTransformer extends Transformer
{
    public static function transform($soldier)
    {
        if (! isset($soldier))
            return null;

        $resource =  [
            'id' => $advert->id,
            'advertableType' => $advert->advertable_type,
            'advertableId' => $advert->advertable_id,
            'adminId' => $advert->admin_id,
            'userId' => $advert->user_id,
            'provinceId' => $advert->province_id,
            'title' => $advert->title,
            'text' => $advert->text,
            'tradeStatus' => $advert->trade_status,
            'verified' => !! $advert->verified,
            'instant' => !! $advert->instant,
            'transferable' => !! $advert->transferable,
            'priority' => $advert->priority,
//            'ladderable' => $advert->ladder_at->diffInSeconds($advert->created_at) > 0 ? true : false,
            'mobile' => $advert->mobile,
            'image' => $advert->image,
            'description' => $advert->description,
            'ladderAt' => $advert->ladder_at,
            'deletedAt' => $advert->deleted_at,
            'createdAt' => $advert->created_at,
            'updatedAt' => $advert->updated_at,
            'jDeletedAt' => CustomDateTime::toJalali($advert->deleted_at),
            'jCreatedAt' => CustomDateTime::toJalali($advert->created_at),
            'jUpdatedAt' => CustomDateTime::toJalali($advert->updated_at),
        ];

//        dd(CustomDateTime::toJalali($advert->created_at->toDateTimeString())->__toString());
//        dd($advert->relationLoaded('advertable'));

        if ($advert->relationLoaded('user'))
            $resource['user'] = UserTransformer::transform($advert->user);

        if ($advert->relationLoaded('admin'))
            $resource['admin'] = UserTransformer::transform($advert->admin);

        if ($advert->relationLoaded('province'))
            $resource['province'] = ProvinceTransformer::transform($advert->province);

//        dd('stop');
        if ($advert->relationLoaded('advertable') && $advert->advertable_type === 'loan')
            $resource['advertable'] = LoanTransformer::transform($advert->advertable);

        if ($advert->relationLoaded('advertable') && $advert->advertable_type == 'loanRequest')
            $resource['advertable'] = LoanRequestTransformer::transform($advert->advertable);

        if ($advert->relationLoaded('advertable') && $advert->advertable_type === 'coSigner')
            $resource['advertable'] = CoSignerTransformer::transform($advert->advertable);

        if ($advert->relationLoaded('advertable') && $advert->advertable_type === 'coSignerRequest')
            $resource['advertable'] = CoSignerRequestTransformer::transform($advert->advertable);

        if ($advert->relationLoaded('advertable') && $advert->advertable_type === 'finance')
            $resource['advertable'] = FinanceTransformer::transform($advert->advertable);

        if ($advert->relationLoaded('advertable') && $advert->advertable_type === 'financeRequest')
            $resource['advertable'] = FinanceRequestTransformer::transform($advert->advertable);

        return $resource;
    }
}
