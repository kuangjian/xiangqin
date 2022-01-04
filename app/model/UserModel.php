<?php
declare (strict_types = 1);

namespace app\model;

use app\model\BaseModel;

/**
 * @mixin \think\Model
 */
class UserModel extends BaseModel
{
    protected $name = 'user';

    protected $append = ['gender_text', 'only_child_text', 'user_status_text'];

    /**
     * [性别转换器]
     * @param  [type] $value [description]
     * @param  [type] $data  [description]
     * @return [type]        [description]
     */
    public function getGenderTextAttr($value, $data)
    {
        $gender = [0 => '未知', 1 => '男', 2 => '女'];
        return $gender[$data['gender']];
    }

    /**
     * [独生子女转换器]
     * @param  [type] $value [description]
     * @param  [type] $data  [description]
     * @return [type]        [description]
     */
    public function getOnlyChildTextAttr($value, $data)
    {
        $only_child = [0 => '未知', 1 => '独生子女', 2 => '非独生子女'];
        return $only_child[$data['only_child']];
    }

    /**
     * [生日转换器]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getBirthdayAttr($value)
    {
        $birthday = date('Y-m-d', $value);
        return $birthday;
    }

    /**
     * [状态转换器]
     * @param  [type] $value [description]
     * @param  [type] $data  [description]
     * @return [type]        [description]
     */
    public function getUserStatusTextAttr($value, $data)
    {
        $user_status = [0 => '未知', 1 => '正常', 2 => '隐藏', 3 => '待审核', 4 => '审核未通过', 5 => '封号'];
        return $user_status[$data['user_status']];
    }

    /**
     * [VIP过期时间转换]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getExpireTimeAttr($value)
    {
        $expire_time = $value ? date('Y-m-d', $value) : '';
        return $expire_time;
    }

    /**
     * [关联户口省信息]
     * @return [type] [description]
     */
    public function householdProvince()
    {
        return $this->hasOne(ProvinceModel::class, 'province_id', 'household_province_id')
            ->bind(['household_province_name' => 'province_name']);
    }

    /**
     * [关联户口市信息]
     * @return [type] [description]
     */
    public function householdCity()
    {
        return $this->hasOne(CityModel::class, 'city_id', 'household_city_id')
            ->bind(['household_city_name' => 'city_name']);
    }

    /**
     * [关联户口县信息]
     * @return [type] [description]
     */
    public function householdCounty()
    {
        return $this->hasOne(CountyModel::class, 'county_id', 'household_county_id')
            ->bind(['household_county_name' => 'county_name']);
    }

    /**
     * [关联户口镇信息]
     * @return [type] [description]
     */
    public function householdTown()
    {
        return $this->hasOne(TownModel::class, 'town_id', 'household_town_id')
            ->bind(['household_town_name' => 'town_name']);
    }

    /**
     * [关联户口村信息]
     * @return [type] [description]
     */
    public function householdVillage()
    {
        return $this->hasOne(VillageModel::class, 'village_id', 'household_village_id')
            ->bind(['household_village_name' => 'village_name']);
    }

    /**
     * [关联所在省信息]
     * @return [type] [description]
     */
    public function locationProvince()
    {
        return $this->hasOne(ProvinceModel::class, 'province_id', 'location_province_id')
            ->bind(['location_province_name' => 'province_name']);
    }

    /**
     * [关联所在市信息]
     * @return [type] [description]
     */
    public function locationCity()
    {
        return $this->hasOne(CityModel::class, 'city_id', 'location_city_id')
            ->bind(['location_city_name' => 'city_name']);
    }

    /**
     * [关联所在县信息]
     * @return [type] [description]
     */
    public function locationCounty()
    {
        return $this->hasOne(CountyModel::class, 'county_id', 'location_county_id')
            ->bind(['location_county_name' => 'county_name']);
    }

    /**
     * [关联所在镇信息]
     * @return [type] [description]
     */
    public function locationTown()
    {
        return $this->hasOne(TownModel::class, 'town_id', 'location_town_id')
            ->bind(['location_town_name' => 'town_name']);
    }

    /**
     * [关联所在村信息]
     * @return [type] [description]
     */
    public function locationVillage()
    {
        return $this->hasOne(VillageModel::class, 'village_id', 'location_village_id')
            ->bind(['location_village_name' => 'village_name']);
    }

    /**
     * [关联择偶省信息]
     * @return [type] [description]
     */
    public function spouseProvince()
    {
        return $this->hasOne(ProvinceModel::class, 'province_id', 'spouse_province_id')
            ->bind(['spouse_province_name' => 'province_name']);
    }

    /**
     * [关联择偶市信息]
     * @return [type] [description]
     */
    public function spouseCity()
    {
        return $this->hasOne(CityModel::class, 'city_id', 'spouse_city_id')
            ->bind(['spouse_city_name' => 'city_name']);
    }

    /**
     * [关联择偶县信息]
     * @return [type] [description]
     */
    public function spouseCounty()
    {
        return $this->hasOne(CountyModel::class, 'county_id', 'spouse_county_id')
            ->bind(['spouse_county_name' => 'county_name']);
    }

    /**
     * [关联婚姻状况]
     * @return [type] [description]
     */
    public function maritalStatus()
    {
        return $this->hasOne(CommonModel::class, 'id', 'marital_status')
            ->bind(['marital_status_name' => 'com_name']);
    }

    /**
     * [关联子女情况]
     * @return [type] [description]
     */
    public function haveChildren()
    {
        return $this->hasOne(CommonModel::class, 'id', 'have_children')
            ->bind(['have_children_name' => 'com_name']);
    }

    /**
     * [关联买车情况]
     * @return [type] [description]
     */
    public function buyCar()
    {
        return $this->hasOne(CommonModel::class, 'id', 'buy_car')
            ->bind(['buy_car_name' => 'com_name']);
    }

    /**
     * [关联买房情况]
     * @return [type] [description]
     */
    public function buyHouse()
    {
        return $this->hasOne(CommonModel::class, 'id', 'buy_house')
            ->bind(['buy_house_name' => 'com_name']);
    }

    /**
     * [关联学历]
     * @return [type] [description]
     */
    public function education()
    {
        return $this->hasOne(CommonModel::class, 'id', 'education')
            ->bind(['education_name' => 'com_name']);
    }

    /**
     * [关联生肖]
     * @return [type] [description]
     */
    public function zodiac()
    {
        return $this->hasOne(CommonModel::class, 'id', 'zodiac')
            ->bind(['zodiac_name' => 'com_name']);
    }

    /**
     * [关联星座]
     * @return [type] [description]
     */
    public function constellation()
    {
        return $this->hasOne(CommonModel::class, 'id', 'constellation')
            ->bind(['constellation_name' => 'com_name']);
    }

    /**
     * [关联民族]
     * @return [type] [description]
     */
    public function nationality()
    {
        return $this->hasOne(NationalityModel::class, 'id', 'nationality')
            ->bind(['nationality_name' => 'nat_name']);
    }

    /**
     * [关联择偶学历]
     * @return [type] [description]
     */
    public function spouseEducation()
    {
        return $this->hasOne(CommonModel::class, 'id', 'spouse_education')
            ->bind(['spouse_education_name' => 'com_name']);
    }

    /**
     * [关联择偶民族]
     * @return [type] [description]
     */
    public function spouseNationality()
    {
        return $this->hasOne(NationalityModel::class, 'id', 'spouse_nationality')
            ->bind(['spouse_nationality_name' => 'nat_name']);
    }

    /**
     * [关联血型]
     * @return [type] [description]
     */
    public function bloodType()
    {
        return $this->hasOne(CommonModel::class, 'id', 'blood_type')
            ->bind(['blood_type_name' => 'com_name']);
    }

    public function getIndex($where = [])
    {
        if (empty($where['limit'])) {
            $where['limit'] = 10;
        }
        return UserModel::with(
            ['householdProvince', 'householdCity', 'householdCounty', 'householdTown', 'householdVillage',
            'locationProvince', 'locationCity', 'locationCounty', 'locationTown', 'locationVillage',
            'maritalStatus', 'haveChildren', 'buyCar', 'buyHouse', 'education', 'zodiac', 'constellation',
            'nationality', 'bloodType', 'spouseProvince', 'spouseCity', 'spouseCounty', 'spouseEducation',
            'spouseNationality']
            )->order('update_time', 'desc')->paginate($where['limit'])->toArray();
    }

    /**
     * [获取用户详情]
     * @param  integer $id [description]
     * @return [type]      [description]
     */
    public function getRead($id = 0)
    {
        return UserModel::with(
            ['householdProvince', 'householdCity', 'householdCounty', 'householdTown', 'householdVillage',
            'locationProvince', 'locationCity', 'locationCounty', 'locationTown', 'locationVillage',
            'maritalStatus', 'haveChildren', 'buyCar', 'buyHouse', 'education', 'zodiac', 'constellation',
            'nationality', 'bloodType', 'spouseProvince', 'spouseCity', 'spouseCounty', 'spouseEducation',
            'spouseNationality']
            )->find($id)->toArray();
    }
}
